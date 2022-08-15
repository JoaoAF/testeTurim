class Pessoa {

   constructor() {
      this.id = 1;
      this.arrayPessoas = [];
   }

   incluir() {

      let pessoa = this.lerCampo();

      if (this.validaCampo(pessoa)) {

         this.adicionar(pessoa);

         var nome = document.querySelector("#pessoa");
         nome.value = '';
         nome.focus();

         this.listar();
      }

   }

   lerCampo() {

      let pessoa = {};

      pessoa.id = this.id;

      pessoa.nome = document.querySelector("#pessoa").value;

      pessoa.filhos = [];

      return pessoa;
   }

   validaCampo(pessoa) {

      if (pessoa.nome == '') {
         alert('Informe o nome da pessoa.')
         return false;
      } else {
         return true;
      }
   }

   adicionar(pessoa) {
      this.arrayPessoas.push(pessoa);
      this.id++;
   }

   listar() {

      let table = document.getElementById("tabela");
      table.innerText = '';

      for (var i = 0; i < this.arrayPessoas.length; i++) {

         let tr = table.insertRow();
         let tdNome = tr.insertCell();
         let tdRemover = tr.insertCell();

         let idTr = this.arrayPessoas[i].id + '_pessoa';
         tr.setAttribute('id', idTr);

         tdNome.innerHTML = "<b>" + this.arrayPessoas[i].nome + "</b>";
         tdRemover.innerHTML = "<button onclick='pessoa.deletarPessoa(" + this.arrayPessoas[i].id + ")' class='waves-effect red btn'><i class='material-icons left'>remove_circle</i>Remover</button>";

         if (this.arrayPessoas[i].filhos.length > 0) {

            for (var j = 0; j < this.arrayPessoas[i].filhos.length; j++) {

               let trfilho = table.insertRow();
               let nomeFilho = trfilho.insertCell();
               let removerFilho = trfilho.insertCell();

               nomeFilho.innerHTML = " - " + this.arrayPessoas[i].filhos[j].nome;
               removerFilho.innerHTML = "<button onclick='pessoa.deletarFilho(" + i + "," + j + ")' class='waves-effect red btn'>Remover filho</button>";

            }

         }

         let trAdd = table.insertRow();
         trAdd.innerHTML = " <button onclick='pessoa.adicionarFilho(" + this.arrayPessoas[i].id + ")' class='waves-effect blue btn'>Adicionar filho</button>";
      }

      this.getArray();
   }

   adicionarFilho(id) {

      var nomeFilho = window.prompt('Informe o nome do filho');
      if (nomeFilho == '') {
         return false;
      }
      for (var i = 0; i < this.arrayPessoas.length; i++) {

         if (this.arrayPessoas[i].id == id) {
            let filho = {};
            filho.id_pessoa = id;
            filho.nome = nomeFilho;
            this.arrayPessoas[i].filhos.push(filho);

         }
      }

      this.listar();
   }

   deletarPessoa(id) {

      for (var i = 0; i < this.arrayPessoas.length; i++) {
         if (this.arrayPessoas[i].id == id) {
            this.arrayPessoas.splice(i, 1);
         }
      }

      this.listar();
   }

   deletarFilho(idPai, idFilho) {

      this.arrayPessoas[idPai].filhos.splice(idFilho, 1);
      this.listar();
   }

   getArray() {

      var textJson = JSON.stringify(this.arrayPessoas, true, 4);
      document.getElementById("json").value = textJson;
      document.getElementById("json").readOnly = true;
   }

   gravar() {

      if (this.arrayPessoas == '') {
         alert('Adicione ao menos uma pessoa para gravar');
      } else {
         const xhttp = new XMLHttpRequest();
         xhttp.open("GET", "gravar.php?json=" + JSON.stringify(this.arrayPessoas));
         xhttp.send();
         alert('Gravado com sucesso!');
      }
   }
}

var pessoa = new Pessoa();

function ler() {

   fetch("ler.php")
      .then((resp) => resp.json())
      .then(function (data) {

         var text = JSON.stringify(data, true, 4);
         document.getElementById("json").value = text;
         var arrayPessoas = JSON.parse(text);
         pessoa.arrayPessoas = arrayPessoas;
         pessoa.listar();

      }).catch((error) => {
         console.log('Algo errado com a consulta!');
      })
}