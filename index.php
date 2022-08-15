<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <!--Import Google Icon Font-->
      <link href="fonts/fonts.css" rel="stylesheet">
      <!--Import materialize.css-->
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="css/materialize.min.css">
      <link rel="stylesheet" href="css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <title>Turim</title>
   </head>
   <body>
      <div class="container">
         <h1>Turim</h1>
         <div class="nav">   
            <button onclick="pessoa.gravar()" class="waves-effect waves-light btn-large">Gravar</button>
            <button onclick="ler('montarTabela')" class="waves-effect waves-light btn-large">Ler</button>
         </div>
         <div class="row">
            <div class="col s7">
               <div class="row">
                  <div class="input-field col s8">
                     <input type="text" id="pessoa">
                     <label for="pessoa">Nome</label>
                  </div>
                  <div class="col s4">
                     <button class="waves-effect waves-light btn-large" onclick="pessoa.incluir()">Incluir</button>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12">
                     <p><b>Pessoas</b></p>
                  <table class="highlight" id="tabela">
                  </table>
                  </div>
               </div>
            </div>
            <div class="col s5">
               <textarea id="json">
               </textarea>
               <label for="json">Json</label>
            </div>
         </div>
      </div>
      <!-- Compiled and minified JavaScript -->
      <script src="js/materialize.min.js"></script>
      <script src="js/script.js" defer></script>
   </body>
</html>