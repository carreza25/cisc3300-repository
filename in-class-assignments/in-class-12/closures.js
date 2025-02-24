function numberGenerator() {
    let num = 100;
    
    function checkNumber() {
      console.log(num + 100);
    }
    return checkNumber;
  }

const number = numberGenerator();
number();