const cats = [
    {
        name: 'Charlie',
        adoptionStatus: 'available'
    },
    {
        name: 'Lily',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Coco',
        adoptionStatus: 'available'
    },
    {
        name: 'Oreo',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Luna',
        adoptionStatus: 'available'
    },
    {
        name: 'Milo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lola',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Leo',
        adoptionStatus: 'available'
    },
    {
        name: 'Willow',
        adoptionStatus: 'available'
    },
    {
        name: 'Bella',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Max',
        adoptionStatus: 'available'
    },
    {
        name: 'Cleo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lucy',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Daisy',
        adoptionStatus: 'available'
    },
];

//result array
let result = [];

console.log('\n');
for (const availableCat of cats) {
    if (availableCat.adoptionStatus === 'available') {
        result.push(availableCat.name);
    }
}

const listOfCats = "My newly adopted cats are: " + result.join(', ') + ".";

console.log(listOfCats);
console.log('\n');

//random number
let randomNumber = (Math.random() * 10 > 5) ? "greater than five!" : "less than five!";
    console.log(randomNumber);
    console.log('\n');

//cat array properties
for (const properties of cats) {
    console.log("Name: " + properties.name); 
    console.log("Adoption Status: " + properties.adoptionStatus);
    console.log('\n');
}

//integer and sting (true/false)
if (1 == '1') {
    console.log(true);
} else {
    console.log(false);
}

if (1 === '1') {
    console.log(true);
} else {
    console.log(false);
}
console.log('\n');

//cute cats
const cuties = cats.map(function(cats) {
    return cats.name + " is so cute!"
  });

console.log(cuties);

