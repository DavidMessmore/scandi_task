$(document).ready(function(){
  
  var allTypeAttr = $(".type_attr");
  var typeVal = {"DVD":0, "Furniture":1, "Book":2};
  var currentTypeAttr = 0;
    
  $("#productType").change(function(){
      var prodType = $(this).children("option:selected").val();
      var prodTypeVal = typeVal[prodType];

      $(allTypeAttr[currentTypeAttr]).fadeOut(200, function(){ 
          $(allTypeAttr[prodTypeVal]).fadeIn(200);
      });
      currentTypeAttr = prodTypeVal;
    });
});