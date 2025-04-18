class Login{
    #correu : string;
    #password : string;

    constructor(correu : string, password : string){
        this.#correu = correu;
        this.#password = correu;
    }
    getCorreu(){
        this.#correu;
    }
    setCorreu(correu : string){
        this.#correu = correu;
    }
    getPassword(){
        this.#password;
    }
    setPassword(password : string){
        this.#password = password;
    }

    verificarCamps(correu : string, password : string){

        if(correu !== "" && password !== ""){

        }   else{

        } 
    
    }
    
}