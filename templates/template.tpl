<style>
  .main {
    padding: 50px;
    display: flex;

    background-color: coral;
  }

  .aside {
    width: 300px;
    height: 600px;

    background-color: blue;
    font-size: 32px;
    color: white;
  }

  .content {
    width: 600px;
    height: 800px;

    background-color: white;
    font-size: 32px;
    color: black;
  }

</style>

<main class="main">
  <aside class="aside">
      SIDEBAR
  </aside>

  <div class="content">
      <?php echo $content; ?>
  </div>
</main>