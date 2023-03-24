(function() {
		
		let field = document.querySelector('.items');
		let li = Array.from(field.children);

		function FilterProduct() {
			/*for(let i of li){
				const name = i.querySelector('strong');
				const x = name.textContent;
				i.setAttribute("data-category", x);
			}*/

			let indicator = document.querySelector('.account-types-categorie').children;

			this.run = function() {
				for(let i=0; i<indicator.length; i++)
				{
					indicator[i].onclick = function () {
						/*for(let x=0; x<indicator.length; x++)
						{
							indicator[x].classList.remove('active');
						}
						this.classList.add('active');*/
						const displayItems = this.getAttribute('data-filter');

						for(let z=0; z<li.length; z++)
						{
							li[z].style.transform = "scale(0)";
							setTimeout(()=>{
								li[z].style.display = "none";
							}, 500);

							if ((li[z].getAttribute('data-category') == displayItems) || displayItems == "all")
							 {
							 	li[z].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[z].style.display = "block";
								}, 500);
							 }
						}
					};
				}
			}
		}

		function SortProduct() {
			let select = document.getElementById('choose-account');
			let ar = [];
			for(let i of li){
				
				ar.push(i);
			}
			this.run = ()=>{
				addevent();
			}
			function addevent(){
				select.onchange = sortingValue;
			}
			function sortingValue(){
			
				if (this.value === 'Default') {
					while (field.firstChild) {field.removeChild(field.firstChild);}
					field.append(...ar);	
				}
				if (this.value === 'LowToHigh') {
					SortElem(field, li, true)
				}
				if (this.value === 'nbre') {
					SortElem(field, li, false)
				}
			}
			function SortElem(field,li, asc){
				let  dm, sortli;
				dm = asc ? 1 : -1;
				sortli = li.sort((a, b)=>{
					const ax = a.getAttribute('data-price');
					const bx = b.getAttribute('data-price');
					return ax > bx ? (1*dm) : (-1*dm);
				});
				 while (field.firstChild) {field.removeChild(field.firstChild);}
				 field.append(...sortli);	
			}
		}

		new FilterProduct().run();
		new SortProduct().run();
	})();



let field = document.querySelector('.items');
let li = Array.from(field.children);

			let ar = [];
			for(let i of li){
				
				ar.push(i);
			}
function bySignature(a,b)
{
	if(parseInt(b.getAttribute('data-price'))>parseInt(a.getAttribute('data-price')))
		{return 1;}
	else if (parseInt(a.getAttribute('data-price'))>parseInt(b.getAttribute('data-price'))) 
		{return -1;}
	else
		{ return 0;}
}


function triSignature(){
	for(let i=0;i<li.length;i++)
	{
		li[i].style.display='none';
	}
	li.sort(bySignature);
	for(let i=0;i<li.length;i++)
	{
		field.appendChild(li[i]);	
		li[i].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[i].style.display = "block";
								}, 500);

	}

	

}
function byName(a,b)
{
	if(a.getAttribute('data-titre').toUpperCase()>b.getAttribute('data-titre').toUpperCase())
		{return 1;}
	else if (b.getAttribute('data-titre').toUpperCase()>a.getAttribute('data-titre').toUpperCase()) 
		{return -1;}
	else
		{ return 0;}
}
function triName(){
	for(let i=0;i<li.length;i++)
	{
		li[i].style.display='none';
	}
	li.sort(byName);
	for(let i=0;i<li.length;i++)
	{
		field.appendChild(li[i]);	
		li[i].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[i].style.display = "block";
								}, 500);

	}

	

}


function byDateASC(a,b)
{
	if(parseInt(a.getAttribute('data-id'))>parseInt(b.getAttribute('data-id')))
		{return 1;}
	else if (parseInt(b.getAttribute('data-id'))>parseInt(a.getAttribute('data-id'))) 
		{return -1;}
	else
		{ return 0;}
}


function triDateASC(){
	for(let i=0;i<li.length;i++)
	{
		li[i].style.display='none';
	}
	li.sort(byDateASC);
	for(let i=0;i<li.length;i++)
	{
		field.appendChild(li[i]);	
		li[i].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[i].style.display = "block";
								}, 500);

	}

	

}




function byDateDESC(a,b)
{
	if(parseInt(b.getAttribute('data-id'))>parseInt(a.getAttribute('data-id')))
		{return 1;}
	else if (parseInt(a.getAttribute('data-id'))>parseInt(b.getAttribute('data-id'))) 
		{return -1;}
	else
		{ return 0;}
}


function triDateDESC(){
	for(let i=0;i<li.length;i++)
	{
		li[i].style.display='none';
	}
	li.sort(byDateDESC);
	for(let i=0;i<li.length;i++)
	{
		field.appendChild(li[i]);	
		li[i].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[i].style.display = "block";
								}, 500);

	}

	

}