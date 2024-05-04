<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM WEBSITE FASILKOM</title>
    <link rel="stylesheet" href="/views/asset/css/style.css">
    <link rel="stylesheet" href="/views/asset/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div>
            <h1>UKM FASILKOM</h1>
        </div>
    </nav>
    <main>
        <form action="./createmahasiswa" method="post" enctype="multipart/form-data">
            <h1>Masukan Data Anda</h1>
            <section>
                <div>
                    <label for="nama">Nama:</label><br>
                    <input required type="text" id="nama" name="nama" class="inputan"><br>
                    <label for="nim">NIM:</label><br>
                    <input required type="number" minlength="10" maxlength="10" id="nim" name="nim" class="inputan"><br>
                    <label for="jk">Jenis Kelamin:</label><br>
                    <select required id="jk" name="jk" class="inputan">
                        <option value="" hidden selected></option>
                        <option value="Laki - laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br>
                </div>
                <div>
                    <label for="prodi">Prodi:</label><br>
                    <input required type="text" id="prodi" name="prodi" class="inputan"><br>
                    <label for="hp">No hp:</label><br>
                    <input required type="number" id="hp" name="hp" class="inputan"><br>
                    <label for="ukm">PIlihan UKM:</label><br>
                    <select required id="ukm" name="ukm" class="inputan">
                        <option value="" hidden selected></option>
                        <option value="futsal">futsal</option>
                        <option value="volly">volly</option>
                        <option value="basket">basket</option>
                    </select><br>
                </div>
                <div class="">
                <label for="sp" class="">Foto</label>
                <input class="" type="file" id="sp" name="sp" accept=".img, .jpeg, .png ,.jpg" require/>
            </div>
            </section><br>
            <button class="button" id="cencel">Cencel</button>
            <button class="button" type="submit" name="proses" value="submit">Submit</button>
        </form>
    </main>

</body>
<script>
    const cencel = document.getElementById('cencel')

    cencel.addEventListener('click', function () {
        window.history.back();
    })
</script>

</html>
