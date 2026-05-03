<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 border p-4 shadow-sm rounded">
            <h1 class="text-center mb-4">Descubra o seu Signo</h1>
            
            <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    <div class="form-text">Ex.: 21/05/1992</div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Descobrir Signo</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>