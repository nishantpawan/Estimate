function validate() {
    var l=document.baseform.length.value;
    var w=document.baseform.width.value;
    var rate=document.baseform.rate.value;
    if(l <12)
            {
                alert('Please enter the valid length.');
                document.baseform.length.value="";
            }
    else if(w <12)
            {
                alert('Please enter the valid width.');
                document.baseform.width.value="";
                
            }
    else if(rate <1)
            {
                alert('Please enter the valid rate.');
                document.baseform.rate.value="";
            }
            return false;
           }
/*--------------------------for flooring---------------------------*/
function flooring(){

    var l=document.baseform.length.value;
    var w=document.baseform.width.value;
    var rate=document.baseform.rate.value;

    var ars=parseFloat((l*w)/144).toFixed(2);
    
    document.baseform.areas.value=ars;

    var e=0.2;//wastage percentage
    var wastage=ars*e;
    console.log(wastage);
    var ars1=ars+wastage;
    console.log(ars1);
    var stotal=parseFloat(ars1)*rate;//SUBTOTAL
    console.log(stotal);
    document.baseform.subtotal.value=stotal.toFixed(2);
    
    var vp=document.baseform.vat.value;
    var vat=(stotal*vp);//VAT CALCULATION BASED ON SELECTION
    document.baseform.vatCharge.value=parseFloat(vat).toFixed(2);
    var tValue=stotal+vat;//GRAND TOTAL
    document.baseform.gtotal.value=parseFloat(tValue).toFixed(2);
    }
function blinds(){
    var l=document.baseform.length.value;
    var w=document.baseform.width.value;
    var rate=document.baseform.rate.value;

    var ars=parseFloat((l*w)/144).toFixed(2);
    document.baseform.areas.value=ars;

    var e=0.2;//wastage percentage
    var wastage=ars*e;
    var stotal=parseFloat((ars+wastage)*rate).toFixed(2);//SUBTOTAL
    

    document.baseform.subtotal.value=stotal;
    
    var vp=document.baseform.vat.value;
    var vat=(stotal*vp);//VAT CALCULATION BASED ON SELECTION
    document.baseform.vatCharge.value=parseFloat(vat).toFixed(2);
    var tValue=stotal+vat;//GRAND TOTAL
    document.baseform.gtotal.value=parseFloat(tValue).toFixed(2);
}

/*------------------------------------------------
    --------------for Curtains-----------------------
    -------------------------------------------------*/
function curtains(){
    var l=document.baseform.length.value;
    var w=document.baseform.width.value;
    var rate=document.baseform.rate.value;
    var nop=Math.ceil((w/20));
    document.baseform.nop.value=nop;

    var lenr=(l/39);
    document.baseform.lenr.value=Math.ceil(lenr);
    var rate=document.baseform.rate.value;

    var fabr=nop*lenr;
    document.baseform.fabr.value=fabr.toFixed(2);

    var stotal=(fabr*rate).toFixed(2);
    document.baseform.subtotal.value=stotal;

    var vp=document.baseform.vat.value;
    var vat=(stotal*vp);
    document.baseform.vatCharge.value=parseFloat(vat).toFixed(2);

    var st=document.baseform.stiching.value;
    var se=0;

    if(st=="eyelet"){
        se=nop*300;
    }
    else if(st=="panel"){
        se=nop*200;
    }
    
    document.baseform.stCost.value=se;
    var g=(stotal+vat+se);
    document.baseform.gtotal.value=parseFloat(g).toFixed(2);   
}

function wallpaper() {
  /* document.baseform.nop.value=0;
    document.baseform.lenr.value=0;
    document.baseform.fabr.value=0;
    document.baseform.stiching.value=not applicable;
    document.baseform.stCost.value=0;
    ------------------------------------------------
    --------------for wallpaper-----------------------
    -------------------------------------------------*/
    var l=document.baseform.length.value;
    var w=document.baseform.width.value;
    var rate=document.baseform.rate.value;
    var wra=document.baseform.wra.value;


    //area of wall
    var AreaofWall=(l*w)/144;
    document.baseform.aofw.value=parseFloat(AreaofWall).toFixed(2);//.toFixed(2);
    //no of rolls 
    var noofRolls=Math.ceil(AreaofWall/wra);
    document.baseform.nofr_roll.value=Math.ceil(noofRolls);
    //subtotal     
    var stotal=(noofRolls*rate);
    document.baseform.subtotal.value=stotal.toFixed(2);
    //vat calculation on subtotal
    var vp=document.baseform.vat.value;
    var vat=stotal*vp;
    
    document.baseform.vatCharge.value=vat.toFixed(2);
    //grand total amount
    var tValue=stotal+vat;
    document.baseform.gtotal.value=tValue.toFixed(2);
    }

    function checkPtype() { 
       // flooring();
    //var ptype=document.baseform.pptype.value;   
    var ptype=document.baseform.pptype.value;
    console.log(ptype);
         if(ptype=="Wallpaper")
        {
            wallpaper();
        }  
        else if(ptype=="Curtains"){
            curtains();
            /*document.baseform.wra.value=NA;
            document.baseform.nofr_roll.value=NA;*/
        }
        else if(ptype=="Flooring")
        {
            console.log("I am at selection");
            flooring();
        }
        

        
    }

