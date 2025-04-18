class Article {
    #id: number;
    #titol: string;
    #cos: string;
    #user_id?: number;
    #data?: string;

    constructor(id: number, titol: string, cos: string, user_id?: number, data?: string){
        this.#id = id;    
        this.#titol = titol;
        this.#cos = cos;
        this.#user_id = user_id;
        this.#data = data;
    }

    public getId(){
        return this.#id;
    }

    public getTitol(){
        return this.#titol;
    }

    public getCos(){
        return this.#cos;
    }

    public getUserID(){
        return this.#user_id;
    }

    public getData(){
        return this.#data;
    }
}

setTimeout(loadArticles, 5000);


//Carrega els articles
function loadArticles() {
    const fetchSpinnerId = "#spinner"; 
    $(fetchSpinnerId).show(); 

    $.ajax({
        url: "model/model_ajax_article.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log("Datos recibidos:", response);

            if (response.error) {
                console.error("Error en la respuesta:", response.error);
            } else {
                $('#articlesTable tbody').empty(); 
                response.data.forEach((article: any) => {
                    addRow(article.id, article.titol, article.cos, article.user_id, article.data);
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error AJAX:", textStatus, errorThrown);
            console.error("Respuesta del servidor:", jqXHR.responseText);
        },
        complete: function () {
            $(fetchSpinnerId).hide(); // Ocultar spinner cuando se complete la carga
        }
    });
}

//Mostrar els articles
function addRow(id: number, titol: string, cos: string, user_id: number | null, data: string | null) {
    const row = $('<tr></tr>');
    row.append(`<td>${titol}</td>`);
    row.append(`<td>${cos}</td>`);
    row.append(`<td>${user_id ?? ''}</td>`);
    row.append(`<td>${data ?? ''}</td>`);
    
    // Botón de eliminación
    const deleteButton = $('<button>Eliminar</button>');
    deleteButton.on('click', function() {
        deleteArticle(id); 
    });
    
    const deleteCell = $('<td></td>').append(deleteButton);
    row.append(deleteCell);

    $('#articlesTable tbody').append(row);
}




//executa la funcio al iniciar la pagina
$(document).ready(function() {
    loadArticles();
});

//borrar els articles
function deleteArticle(id: number) {
    $.ajax({
        url: 'model/model_ajax_borrar_article.php',  
        type: 'POST',  
        data: {
            id: id  
        },
        success: function(response) {
            console.log("Respuesta del servidor:", response);
            if (response.success) {
                console.log("Article eliminat amb èxit");
                // Aquí puedes actualizar la tabla o realizar cualquier acción después de la eliminación
                $('#articlesTable tbody').empty();  // Vaciar la tabla antes de recargarla
                loadArticles();  // Recargar los artículos para reflejar los cambios
            } else {
                console.error("Error al eliminar l'article:", response.error || "No especificado");
            }
        },
        error: function() {
            console.error("Error de comunicació amb el servidor");
        }
    });
}


