<span class="menu-point" v-bind:class="{active: activeSection == index}" v-on:click="scrollToSection(index)"
  v-for="(offset, index) in offsets" v-bind:key="index">
</span>
</div>
<section class="fullpage blue">
  <h1>Teste App Facilita</h1>
  <p class="p-name">por <a href="https://www.linkedin.com/in/lucas-henrique-souza-4395441b7/" target="_blank">Lucas
      Henrique Souza de Lima</a></p>
</section>
<section class="fullpage orange">
  <h1>Exercício 1</h1>
  <h2> Tempo: <?=$ex1?> anos.</h2>
</section>
<section class="fullpage red">
  <h1>Exercício 2</h1>
  <form method="POST">
    <div class="box">
      <label for="book">Nome do Livro: </label>
      <input v-model="book" name="book" id="book" type="text" placeholder="Digite o nome do livro">
      <label for="type">Tipo: </label>
      <select v-model="type" name="type" id="type">
        <option value="Professor">Professor</option>
        <option value="Aluno" selected>Aluno</option>
      </select>

      <button id="show-modal" @click="setModal()">Gerar</button>

      <modal v-if="showModal" @close="showModal = false">
        <h3 slot="header">Recibo</h3>
        <h3 slot="body"> Livro: {{ book }} </h3>
        <h3 slot="body-2"> Tipo: {{ type }} </h3>
        <h3 slot="footer"> Tempo: {{ time }} dias </h3>

      </modal>

  </form>

</section>
</section>
<section class="fullpage green">
  <h1>Exercício 3</h1>
  <table>
    <tr>
      <th>Coluna 1</th>
      <th>Coluna 2</th>
      <th>Coluna 3</th>
      <th>Coluna 4</th>
      <th>Coluna 5</th>
    </tr>
    <?php 
     for($k = 0; $k <= 4; $k++):
      
      echo "<tr>"; 

        for($l=0;$l<=4;$l++):
          ?>

    <td><?=rand(1, 100)*2 + 1?></td>
    <?php 
        endfor;
        
        echo "</tr>";     
      endfor;
  ?>
  </table>
  <table>
    <tr>
      <th>Coluna 1</th>
      <th>Coluna 2</th>
      <th>Coluna 3</th>
      <th>Coluna 4</th>
      <th>Coluna 5</th>
    </tr>
    <?php 
    for($m = 0; $m <= 4; $m++):
      
      echo "<tr>"; 
  
        for($n=0;$n<=4;$n++):
        ?>

    <td><?=rand(1, 100)*2?></td>

    <?php 
        
        endfor;
        
        echo "</tr>";
    
    endfor;
  ?>

  </table>
</section>
</div>
