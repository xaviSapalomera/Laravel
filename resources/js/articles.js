"use strict";
class Article {
    #id;
    #titol;
    #cos;
    #user_id;
    #data;
    constructor(id, titol, cos, user_id, data) {
        this.#id = id;
        this.#titol = titol;
        this.#cos = cos;
        this.#user_id = user_id;
        this.#data = data;
    }
    getId() {
        return this.#id;
    }
    getTitol() {
        return this.#titol;
    }
    getCos() {
        return this.#cos;
    }
    getUserID() {
        return this.#user_id;
    }
    getData() {
        return this.#data;
    }
}

setTimeout(carregaArticles, 5000);

function carregaArticles() {
    $("#spinner").show();
    $.ajax({
        url: "http://127.0.0.1:8000/articles",
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log("Datos recibidos:", response);
            $('#articlesTable tbody').empty();
            response.data.forEach((article) => {
                addRow(article.id, article.titol, article.cos, article.user_id, article.data);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error AJAX:", textStatus, errorThrown);
            console.error("Respuesta del servidor:", jqXHR.responseText);
        }
    });
}

function addRow(id, titol, cos, user_id, data) {
    const row = $('<tr></tr>');
    row.append(`<td>${titol}</td>`);
    row.append(`<td>${cos}</td>`);
    row.append(`<td>${user_id ?? ''}</td>`);
    row.append(`<td>${data ?? ''}</td>`);

    
    const deleteButton = $('<button>Eliminar</button>');
    deleteButton.on('click', function () {
        eliminarArticle(id);
    });

    row.append($('<td></td>').append(deleteButton));
    $('#articlesTable tbody').append(row);
}

$(document).ready(function () {
    carregaArticles();
});

function eliminarArticle(id) {
    $.ajax({
        url: `http://127.0.0.1:8000/articles/${id}`,
        type: "DELETE",
        success: function (response) {
            console.log("Article eliminat:", response);
            loadArticles();
        },
        error: function () {
            console.error("Error de comunicació amb el servidor");
        }
    });
}
