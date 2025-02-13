const sentences = [
    "Pinecone is so cute.",
    "My brother is cat sitting 2 cats named Daikon and Yuzu.",
    "Those cats aren't named Pinecone.",
];

const pinecone = (str) => {
    return str.includes('Pinecone');
};

const pineconeFound = sentences.filter(pinecone);

console.log(pineconeFound);