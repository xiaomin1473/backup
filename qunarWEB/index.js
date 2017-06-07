document.domain="qunar.com";
QunarHistory={};
DFlight={};
SFlight={};
HotelDetail={};
IFlight={};
new function(){
   function trim (t){
      return (t||"").replace(/^\s+|\s+$/g, "");
   }

   function cookieUtil (name, value, options) {
      if (typeof value != 'undefined') {
         options = options || {};
         if (value === null) {
            value = '';
            options.expires = -1;
         }
         var expires = '';
         if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
               date = new Date();
               date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
               date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); 
         }
         var path = options.path ? '; path=' + options.path : '';
         var domain = options.domain ? '; domain=' + options.domain : '';
         var secure = options.secure ? '; secure' : '';
         document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
      } else {
         var cookieValue = null;
         if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
               var cookie = trim(cookies[i]);
               if (cookie.substring(0, name.length + 1) == (name + '=')) {
                  cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                  break;
               }
            }
         }
         return cookieValue;
      }
   };

   var cookieOPTS={
      expires : new Date(2888,8,8)
   }

   function _digits(i){
      return i<10 ? "0" + i : "" + i ;
   }
   function unpackdate(str){
      
      return new Date(parseInt('20'+str.substring(0,2),10),parseInt(str.substring(2,4),10)-1,parseInt(str.substring(4,6),10));
   }
   function packdate(_date){
      return _digits(_date.getFullYear()%100)+_digits(_date.getMonth()+1)+_digits(_date.getDate());
   }

   HotelTrack = function(city){
      this.dates = [];
      this.city= city || null;
      this._type = 'HL';
   }

   HotelTrack.prototype.addDate = function(from,to){
      from = new Date(from.getFullYear(),from.getMonth(),from.getDate()).getTime();
      to = new Date(to.getFullYear(),to.getMonth(),to.getDate()).getTime();

      var dates = this.dates;
      var haz = false;
      for(var i=0;i<Math.min(dates.length,2);i++){
         if(dates[i][0]==from)
            haz=true;
      }
      this.dates=dates.slice(0,2);
      if(!haz)
         this.dates.push([from,to]);
   }
   HotelTrack.prototype.equals = function(node){
       return false;
   }
   HotelTrack.prototype.getKey = function(){
      return this.getType()+'|'+this.city+'|';
   }

   HotelTrack.prototype.setType = function( _t ){
      this._type = _t;
   }

   HotelTrack.prototype.getType = function(){
      return this._type;
   }

   HotelTrack.prototype.merge = function(other){
      
      var dates = other.dates;
      for(var j=0;j<dates.length;j++)
         this.addDate(new Date(dates[j][0]),new Date(dates[j][1]));
      
   }

   HotelTrack.prototype.toArray = function(list){
      var dates = this.dates;
      var re=[];
      for(var i=0;i<dates.length;i++){
         var node = {
            toCity: this.city,
            fromDate : new Date(dates[i][0]),
            toDate : new Date(dates[i][1])
         }
         re.push(node);
         list.push(node);
      }
      return re;
   }

   HotelTrack.prototype.toString = function(){
      var sb=[];
      var dates = this.dates;
      for(var i=0;i<dates.length;i++)
         sb.push(packdate(new Date(dates[i][0]))+'-'+packdate(new Date(dates[i][1])));
      return this.getKey()+sb.join(',');
   }


   DFlight = function(fromCity,toCity,timestamp){
      this.fromCity=fromCity;
      this.toCity=toCity;
      this.timestamp = timestamp;
   }

   //DFlight.prototype.addDate=HotelTrack.prototype.addDate;
   DFlight.prototype.addDate = function(fromDate,toDate){
      this.fromDate = fromDate;
      this.toDate = toDate;
   }

   DFlight.prototype.getKey = function(){
      return this.getType()+'|'+this.fromCity+','+this.toCity+'|'+ this.timestamp +'|';
   }
   DFlight.prototype.getType = function(){
      return 'DL';
   }
   DFlight.prototype.merge = function(){
   
   }
   DFlight.prototype.addCountry = function(fromCountry,toCountry){
      this.fromCountry = fromCountry;
      this.toCountry = toCountry;
   }
   DFlight.prototype.toArray = function(list){
      
      var re=[];
      
         var node = {
            fromCity:this.fromCity,
            toCity: this.toCity,
            fromDate : new Date(this.fromDate),
            toDate : new Date(this.toDate),
            timestamp : this.timestamp,
            fromCountry : this.fromCountry,
            toCountry : this.toCountry
         }
         if(typeof this.fromCountry != 'undefined'){
            re.push(node);
            list.push(node);
         }
         
            
         
      
      return re;
   }
   
   function compareDate(d1,d2){
   
      if(d1.getFullYear()!=d2.getFullYear() || 
         d1.getMonth()!=d2.getMonth() ||
         d1.getDate() != d2.getDate()){
         
         return false;
      }
      return true;
   }
   DFlight.prototype.toString = function(){
      sb = [];
      sb.push(packdate(new Date(this.fromDate))+'-'+packdate(new Date(this.toDate)));
      return this.getKey()+sb.join(',')+'|'+this.fromCountry+','+this.toCountry;
   }
   
   DFlight.prototype.equals = function(n){
      if(n == undefined)return false;
      if((this.toCity == n.toCity) && (this.fromCity == n.fromCity) &&
               compareDate(this.fromDate, n.fromDate) && compareDate(this.toDate,n.toDate)
               )
            return true;
      else return false;
   }

   var parsers={
      'HL' : // HL|$toCity|[$fromDate,$toDate]
         function(parts){
            var hotel = new HotelTrack(parts[1]);
            var dates = parts[2].split(',');
            for(var i=0;i<dates.length;i++){
               var ds = dates[i].split('-');
               hotel.addDate(unpackdate(ds[0]),unpackdate(ds[1]));
            }
            return hotel;
         },
      'DL' : // DL|$fromCity,$toCity|$timestamp|[$fromDate,$toDate]|$fromCountry,$toCountry
         function(parts){
            var cities=parts[1].split(',');
            var dflight = new DFlight(cities[0],cities[1],parts[2]);
            var dates = parts[3].split('-');
            dflight.addDate(unpackdate(dates[0]),unpackdate(dates[1])); 
               
            if ( parts.length > 4){
               var cons=parts[4].split(',');
               dflight.addCountry(cons[0],cons[1]);   
            } 
            return dflight;
         },
      'SF': // SF|$fromCity,$toCity|timestamp|[$fromDate]|$fromCountry
         function(parts){
            var cities=parts[1].split(',');
            var sflight = new SFlight(cities[0],cities[1],parts[2]);
            sflight.addDate(unpackdate(parts[3])); 
            if(parts.length > 4){
               sflight.addCountry(parts[4]);
            }
            return sflight;
         },
      'HD': // HD|$HotelSeq|$HotelName|[$CheckIn-$CheckOut]
         function(parts){
            var hoteldetail = new HotelDetail(parts[1],parts[2]);
            var dates = parts[3].split(',');
            for(var i=0;i<dates.length;i++){
               var ds = dates[i].split('-');
               hoteldetail.addDate(unpackdate(ds[0]),unpackdate(ds[1]));
            }
            return hoteldetail;
         },
      'IF' : // IF|$fromCity,$toCity|timestamp|$fromDate-$toDate
         function(parts){
            var cities=parts[1].split(',');
            var iflight = new IFlight(cities[0],cities[1],parts[2]);
            var dates = parts[3].split('-');          
            iflight.addDate(unpackdate(dates[0]),unpackdate(dates[1]));
            if ( parts.length > 4){
               var cons=parts[4].split(',');
               iflight.addCountry(cons[0],cons[1]);   
            } 
            return iflight;
         }
   };

   parsers.HBL = parsers.HL;
   parsers.HDL = parsers.HL;
   parsers.HLL = parsers.HL;
   parsers.HTL = parsers.HL;

   QunarHistory.addNode = function(node,url){
   
      var lines = (cookieUtil("HotelHistory") || '').split('^');
      var key = node.getKey();
      var data = [node];
      var type = node.getType();
      var num = 1;
      var MAX = 4;
      var prefix = node.getType()+'|';

      for(var i=0;i<lines.length;i++){
         if(!lines[i])
            continue;
         var arr = lines[i].split('|');
         var ht;
         
         if(lines[i].substring(0,key.length) == key || (lines[i].substring(0,type.length) == type  && node.equals(parsers[node.getType()](lines[i].split('|'))))){
            try{
               ht = parsers[node.getType()](lines[i].split('|')); 
               node.merge(ht);
            }catch(e){}

         }else if(lines[i].substring(0,prefix.length) == prefix ){
            if(num++ < MAX)
               data.push(lines[i]);
         }else
            data.push(lines[i]);
      }
      cookieUtil("HotelHistory",data.join('^'),cookieOPTS);
      if(url)
         this.sendUrlandTitle(url,node.toString());
      else
         this.sendUrlandTitle('',node.toString());
   }

   QunarHistory.addHotelLists = function( ops , type ){
      var first = new HotelTrack(ops.toCity);
      if( type )
         first.setType( type );
      first.addDate(ops.fromDate,ops.toDate);
      QunarHistory.addNode(first);
   }

   DFlight.addDLFLists = function(ops){   //DulFilghtList
      var first = new DFlight(ops.fromCity,ops.toCity);
      first.addDate(ops.fromDate,ops.toDate);
      QunarHistory.addNode(first);
   }


   QunarHistory.findEntries = function(key){
      var list=[];
      var cookieHist = cookieUtil("HotelHistory") || '';
      var lines = cookieHist.split('^');
      var prefix = key+'|';
      
      for(var i=0;i<lines.length;i++){
         if(!lines[i])
            continue;   
         if(lines[i].substring(0,prefix.length) == prefix){
            try{
            
               var ht = parsers[key](lines[i].split('|'));
               ht.toArray(list);          
            }catch(e){}
         }
      }
      
      return list;
      
   }

   QunarHistory.getHotelLists = function( type ){
      return QunarHistory.findEntries( type || 'HL');
   }
   //SFlight--------------------------
   SFlight = function(fromCity,toCity,timestamp){
      this.fromCity=fromCity;
      this.toCity=toCity;
      this.timestamp = timestamp;
   }
   
   SFlight.prototype.addDate=function(from){
      this.fromDate = from;
   }
   SFlight.prototype.addCountry = function(fromCountry){
      this.fromCountry = fromCountry;
   }
   SFlight.prototype.equals = function(node){
      

      if((this.toCity == node.toCity) && (this.fromCity == node.fromCity) &&
               compareDate(this.fromDate, node.fromDate) 
               )
            return true;
      else return false;
   }
   SFlight.prototype.getKey = function(){
      return this.getType()+'|'+this.fromCity+','+this.toCity+'|'+this.timestamp+'|';
   }
   SFlight.prototype.getType = function(){
      return 'SF';
   }
   SFlight.prototype.merge = function(other){
      
   }

   SFlight.prototype.toArray = function(list){
      var re=[];
      
         var node = {
            fromCity:this.fromCity,
            toCity: this.toCity,
            fromDate : this.fromDate,
            timestamp : this.timestamp,
            fromCountry : this.fromCountry
         }
         if(typeof this.fromCountry != 'undefined'){
            re.push(node);
            list.push(node);
         }
      
      return re;
   }

   SFlight.prototype.toString = function(){
      var sb=[];
      var dates = this.dates;
      sb.push(packdate(new Date(this.fromDate)));
      return this.getKey()+sb.join(',')+'|'+this.fromCountry;
   }
   
   SFlight.addSFLists = function(ops){ //SinFilghtList
      var first = new SFlight(ops.fromCity,ops.toCity);
      first.addDate(ops.fromDate);
      QunarHistory.addNode(first);
   }

//HotelDetail------------
      HotelDetail = function(HotelSeq,HotelName){
      this.dates = [];
      this.HotelSeq = HotelSeq || null;
      this.HotelName = HotelName || null;
      
   }

   HotelDetail.prototype.addDate = function(CheckIn,CheckOut){
      CheckIn = new Date(CheckIn.getFullYear(),CheckIn.getMonth(),CheckIn.getDate()).getTime();
      CheckOut = new Date(CheckOut.getFullYear(),CheckOut.getMonth(),CheckOut.getDate()).getTime();

      var dates = this.dates;
      var haz = false;
      for(var i=0;i<Math.min(dates.length,2);i++){
         if(dates[i][0]==CheckIn)
            haz=true;
      }
      this.dates=dates.slice(0,2);
      if(!haz) 
      {
         this.dates.push([CheckIn,CheckOut]);
      }
   }
   
   HotelDetail.prototype.getKey = function(){
      return this.getType()+'|'+this.HotelSeq+'|'+this.HotelName+'|';
   }

   HotelDetail.prototype.getType = function(){
      return 'HD';
   }

   HotelDetail.prototype.merge = function(other){
      var dates = other.dates;
      for(var j=0;j<dates.length;j++)
         this.addDate(new Date(dates[j][0]),new Date(dates[j][1]));
   }

   HotelDetail.prototype.toArray = function(list){
      var dates = this.dates;
      var re=[];
      for(var i=0;i<dates.length;i++){
         var node = {
            HotelSeq: this.HotelSeq,
            HotelName: this.HotelName,
            CheckIn : new Date(dates[i][0]),
            CheckOut : new Date(dates[i][1])
         }
         re.push(node);
         list.push(node);
      }
      return re;
   }

   HotelDetail.prototype.toString = function(){
      var sb=[];
      var dates = this.dates;
      for(var i=0;i<dates.length;i++)
         sb.push(packdate(new Date(dates[i][0]))+'-'+packdate(new Date(dates[i][1])));
      return this.getKey()+sb.join(',');
   }
   HotelDetail.prototype.equals = function(node){
      
    return false;
   }
   //------------------
   IFlight = function(fromCity,toCity,timestamp){
      this.fromCity = fromCity;
      this.toCity = toCity;
      this.timestamp = timestamp;
   }

   IFlight.prototype.addDate= function(fromDate,toDate){
      this.fromDate = fromDate;
      this.toDate = toDate;
   }
   
   IFlight.prototype.addCountry = function(fromCountry,toCountry){
      this.fromCountry = fromCountry;
      this.toCountry = toCountry;
   }
   IFlight.prototype.equals = function(n){
      
      if((this.toCity == n.toCity) && (this.fromCity == n.fromCity) &&
               compareDate(this.fromDate, n.fromDate) && compareDate(this.toDate,n.toDate)
               )
            return true;
      else return false;
   }
   
   IFlight.prototype.getKey = function(){
      return this.getType()+'|'+this.fromCity+','+this.toCity+'|'+ this.timestamp +'|';
   }
   IFlight.prototype.getType = function(){
      return 'IF';
   }
   IFlight.prototype.merge = function(){
   }

   IFlight.prototype.toArray = function(list){
      var re=[];
      
         var node = {
            fromCity:this.fromCity,
            toCity: this.toCity,
            fromDate : this.fromDate,
            toDate : this.toDate,
            timestamp : this.timestamp,
            fromCountry : this.fromCountry,
            toCountry : this.toCountry
         }
         if(typeof this.fromCountry != 'undefined'){
         re.push(node);
         list.push(node);
      }
      return re;
   }

   IFlight.prototype.toString = function(){
      sb = [];
      sb.push(packdate(new Date(this.fromDate))+'-'+packdate(new Date(this.toDate)));
      return this.getKey()+sb.join(',')+'|'+this.fromCountry+','+this.toCountry;
   }
   
      //record to server DB
   QunarHistory.sendUrlandTitle=function(url,title){
//    var _script = document.createElement("script");
//    _script.type= "text/javascript";
//    _script.src= "http://history.qunar.com/jxTracker.jcp?action=track&url="+encodeURI(url)+'&title='+encodeURI(title)+'&sid='+new Date().getTime();
//    var head = document.getElementsByTagName("head")[0];
//    head.appendChild(_script);
   }

}