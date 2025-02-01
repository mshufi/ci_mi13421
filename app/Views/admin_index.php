<!DOCTYPE html>
<html>
<head>
    <title>Administrator Panel</title>
    <link rel="stylesheet" type="text/css" 
        href="<?=base_url('public/css/bootstrap.min.css');?>">
</head>
<body style="background-color: #CCE5FF">
<div class="container bg-light p-2 mt-3">
	<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand fw-bold" href="<?=base_url('admin');?>">
	    	Sport Store
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav">
	        <a class="nav-link active" href="<?=base_url('produk');?>">
	        	Products
	        </a>
	        <a class="nav-link active" href="<?=base_url('customer');?>">Customers</a>
	        <a class="nav-link active" href="#">Transactions</a>
	        <a class="nav-link active text-warning fw-bold" href="#">Logout</a>
	      </div>
	    </div>
	  </div>
	</nav>
	<div class="mt-2 p-3 border border-primary rounded border-2">
		<?=view($page);?>
	</div>
</div>
<div class="toast <?=@$data_alert['on'];?> position-fixed bottom-0 end-0 
<?=@$data_alert['tema'];?>" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto"><?=@$data_alert['judul'];?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-light">
    <?=@$data_alert['pesan'];?>
  </div>
</div>

<script type="text/javascript">
const ModalDelete = document.getElementById('ModalDelete')
const linkdel = document.getElementById('linkdel')
	if (ModalDelete) {
	  ModalDelete.addEventListener('show.bs.modal', event => {
	    const button = event.relatedTarget
	    const kode = button.getAttribute('data-bs-kode')
	    const ctr_ci = button.getAttribute('data-bs-ctr');
	    linkdel.href = ctr_ci+'/proses_delete/'+kode
	  })
	}
</script>
<script type="text/javascript">
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<script type="text/javascript" 
    src="<?=base_url('public/js/bootstrap.bundle.min.js');?>"></script>
</body>
</html>