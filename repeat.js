function theFunctionTwo(z) {
   var c = function() {return 2;};

   function square(x) {return x*x;}
   
   function Complex(real, imaginary) {
	   this.x = real;
	   this.y = imaginary;
   }
   Complex.prototype.sum = function() {
	   return this.x + this.y;
   }

   var z = new Complex(0,0);
   z.sum();
   
   var d = 2;
   var e = 'asdf';
   var f = null;
   var g = true;
   var h = false;
   var i = 3.567;
   var j = 'jkl;';
   var k = '';
   window.onafterprint=function() {return 4;};
   var l = window;
   var m = [3];
   var n = document;
   var o = l;
}
function theFunctionOne() {
   setTimeout("theFunctionOne()", 5000);
   var a = 2;
   var b = 2;
   theFunctionTwo(3);
   alert("hi");
   var c = 2;
}
