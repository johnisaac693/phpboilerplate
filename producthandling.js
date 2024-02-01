let products = [
    {
        "id": "NCKLC01",
        "name":"Mystic Moonstone Cascade Necklace",
        "type": "necklace",
        "price": 100
        
      

    },
    {
        "id": "NCKLC02",
        "name":"Regal Orchid Pearl Strand",
        "type": "necklace",
        "price": 100
        
      
    },
    
    {
        "id": "NCKLC03",
        "name":"Sapphire Serenade Collar",
        "type": "necklace",
        "price": 100
        
    },
    {
        "id": "NCKLC04",
        "name":"Whispering Willow Pendant",
        "type": "necklace",
        "price": 100
        
    }
    
    
];

fetch('../JS/products.json')
    .then(response => response.json())
    .then(data => {
        products = data;
        
    })
console.log(products);
