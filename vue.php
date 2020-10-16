<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/vue@next" defer></script>
    <script src="app.js" defer></script>
    <title>Vue Imp</title>
</head>

<body>
    <header>
        <h1>Vue detrás de las escenas</h1>
    </header>
    <section id="app">
        <h2>Cómo funciona Vue</h2>
        <input type="text" ref="userText">
        <button @click="setText">Establecer texto</button>
        <p>{{ message }}</p>
    </section>

    <section id="app2">
        <!-- <p>{{ message }}</p> No tiene conexión con las dos apps -->

    </section>
</body>

</html>