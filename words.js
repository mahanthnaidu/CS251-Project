function Dictionary() {
    this.words = [];
    this.indices = {};
}

function add(word) {
    if (this.indices[word] == null) {
        this.words.push(word);
        this.indices[word] = this.words.length - 1;
    }
}

function randum() {
    var index = Math.floor(Math.random() * this.words.length);
    return this.words[index];
}

Object.assign(Dictionary.prototype, { add, randum });
var dict = new Dictionary();
dict.add('clock');
dict.add('apple');
dict.add('waterfall');
dict.add('shower');
dict.add('tree');
dict.add('mountain');
dict.add('camel');
dict.add('boy');
dict.add('girl');
dict.add('kangaroo');
dict.add('bus');
dict.add('train');
dict.add('waterbottle');
dict.add('gun');
dict.add('ghost');
dict.add('laptop');
dict.add('bag');
dict.add('ocean');
dict.add('movie');
dict.add('chair');
dict.add('crown');
dict.add('helmet');
dict.add('ring');
dict.add('shirt');
dict.add('trouser');
dict.add('plane');
dict.add('cycle');
dict.add('car');
dict.add('hammer');
dict.add('shield');
dict.add('arrow');
dict.add('knife');
dict.add('grapes');
dict.add('watch');
dict.add('shoe');
dict.add('coat');
dict.add('cricketbat');
dict.add('rain');
dict.add('sun');
dict.add('moon');
dict.add('earth');
dict.add('plate');
dict.add('glass');
dict.add('plant');
dict.add('dog');
dict.add('snake');
dict.add('pig');
dict.add('elephant');
dict.add('bucket');
dict.add('rocket');

function check(){
    var d = dict.randum();
    var input = document.getElementById("name").value ;
    if(input==d){
        alert("You guessed the word !!")
    }
    else{
        alert("Oops ! Try Again ")
    }
}

// console.log(dict.rand());