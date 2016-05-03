/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
function validate()
    {
            if(document.f1.length.value <12)
            {
                alert("Please enter the valid data.");
            }
            else if(document.f1.width.value <12)
            {
                alert("Please enter the valid data.");
                exit();
            }
            else if(document.f1.rate.value <1)
            {
                alert("Please enter the valid data.");
            }
    }*/
function curtainCalc(){  
    var l=document.c1.length.value;
    var w=document.c1.width.value;

    var nop=Math.ceil((w/20));
    document.c1.nop.value=nop;

    var lenr=(l/39);
    document.c1.lenr.value=Math.ceil(lenr);
    var rate=document.c1.rate.value;

    var fabr=nop*lenr;
    document.c1.fabr.value=fabr.toFixed(2);

    var stotal=((fabr*rate));
    document.c1.stotal.value=stotal.toFixed(2);
    var vat =(fabr*rate*5.5/100);
    document.c1.vat.value=vat.toFixed(2);
    document.c1.tAmount.value=(stotal+vat).toFixed(2);
    var st=document.c1.stiching.value;
    var se;
    if(st=="eyelet")
    {
        se=nop*300;
        
    }
    else if(st=="panel"){
        se=nop*200;
        
    }
    document.c1.st1.value=se;
    
    

}
function calcWall() {
    var l=document.w1.length.value;
    var w=document.w1.width.value;
    var rate=document.w1.rate.value;
    var wra=document.w1.wra.value;

    var AreaofWall=(l*w)/144;
    document.w1.aofw.value=AreaofWall.toFixed(2);

    var noofRolls=Math.ceil(AreaofWall/wra);
    document.w1.nofr.value=Math.ceil(noofRolls);
    document.w1.stotal.value=(noofRolls*rate).toFixed(2);
    var p=((noofRolls*rate)*0.145);
    document.w1.vat.value=p.toFixed(2);
    var tValue=(noofRolls*rate)+p;
    document.w1.tvalue.value=tValue.toFixed(2);
}



    function calc()
    {
        var l=document.f1.length.value;
        var w=document.f1.width.value;
        var prod=document.f1.prd.value;
        if(prod=="Curtains")
        {
            document.f1.rate.value=10;
        }
        if(prod=="Flooring")
        {
            document.f1.rate.value=30;
        }
        if(prod=="Blinds")
        {
            document.f1.rate.value=40;
        
		}    
		 if(prod=="Wallpaper")
        {
            document.f1.rate.value=20;
			document.f1.stax.value=0;
        }
		var p=document.f1.rate.value;
        var np=w/20;
        var fqty=(l/39*np);
		 var t=fqty*p;
        var stax=t*14.5/100;
		 if(prod=="Wallpaper")
        {
			document.f1.stax.value=0;
        }
		else{
        document.f1.stax.value=stax;
		}
        document.f1.total.value=t+stax;       
    }
    

