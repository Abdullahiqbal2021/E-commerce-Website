// Search Functunality
var input = document.getElementById("search-input");
function tableSearch() {
  // Initializing variables
  var filter = input.value.toUpperCase();
  // let table = document.getElementById("myTable")
  let tr = document.getElementsByTagName("tr");

  for (let i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      let textValue = td.textContent || td.innerText;
      if (textValue.toUpperCase().indexOf(filter) > -1) {
        console.log();
        tr[i].style.display = ""
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  
}
function search() {
  // let input2 = document.getElementById("search-input");
  // let filter2 = input2.value.toUpperCase();
  let productItems = document.querySelectorAll(".product-items");
  var filter = input.value.toUpperCase();
  
  for (let j = 0; j < productItems.length; j++) {
    let prodName = productItems[j].getElementsByClassName("prod-name")[0];
    
    if (prodName) {
      let textValue = prodName.textContent || prodName.innerText;
      if (textValue.toUpperCase().indexOf(filter) > -1) {
        console.log();
        productItems[j].style.display = "";
      } else {
        productItems[j].style.display = "none";
      }
    }
  }

}