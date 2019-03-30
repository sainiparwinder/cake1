
<?= $this->element("header") ?>
<body>
    
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
   <?= $this->element("footer") ?>
</body>
</html>
