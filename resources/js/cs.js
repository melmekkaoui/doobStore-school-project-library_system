import {books} from'./book.js';
let desc;
window.addEventListener('load',()=>{
  let output = "";
  let noOutput  = "";
  const classic  = books.filter(classic => classic.categories === 'cs' );
  if (classic.length > 0){
    for( var i=0; i<classic.length;i++){
    
        desc = classic[i].shortDescription;
        let myDesc = desc.slice(0,30);
        
         output += `
         <div class="col-sm-3">
            <div class="card" style="margin-bottom:30px">
            <img class="card-img-top" src="${classic[i].thumbnailUrl}" style="height:400px;width:90%" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">${classic[i].title}</h5>
                    <p class="card-text">${desc}</p>
                    <a href="#" class="btn rounded-pill main-btn">View More</a>
                    <button class="btn btn-warning rounded-pill">Add to cart</button>
                </div>
            </div>
       </div>
        `;
        document.getElementById("books-container").innerHTML = output;
        }
  }
  else{
      noOutput =`<div class="alert alert-warning" role="alert">
      Sorry! No book from this <a href="classic.html" class="alert-link">Category List</a>.
    </div>`;
    document.getElementById("books-container").innerHTML = noOutput;
  }
  

})