/*import {books} from'./book.js';
let desc;
window.addEventListener('load',()=>{
    let output='';
        for( var i=0; i<8;i++){
        desc = books[i].shortDescription;
        let myDesc = desc.slice(0,30);
        console.log(myDesc);
         output += `
         <div class="col-sm-3">
            <div class="card" style="margin-bottom:30px">
            <img class="card-img-top" src="${books[i].thumbnailUrl}" style="height:400px;width:90%" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">${books[i].title}</h5>
                    <p class="card-text">${desc}</p>
                    <a href="#" class="btn rounded-pill main-btn">View More</a>
                    <button class="btn btn-warning rounded-pill">Add to cart</button>
                </div>
            </div>
       </div>
        `;
        document.getElementById("books-container").innerHTML = output;
        }
})
*/