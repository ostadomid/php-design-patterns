class Person{

    public constructor(private firstName: string, private lastName: string) {
        
    }

    public whoAmI(): string{
        return this.firstName + ' ' + this.lastName;
    }
}

let p = new Person('Bob', 'Dean');
console.log(p.whoAmI());