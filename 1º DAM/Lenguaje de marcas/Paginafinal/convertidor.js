<!DOCTYPE html>
<html>
<head>
  <title>Conversor XML a XSL</title>
  <script>
    function convertirXMLaXSL() {
      // Obtener el contenido del XML
      var xmlContent = document.getElementById('xmlContent').value;

      // Crear un objeto DOMParser para analizar el XML
      var parser = new DOMParser();
      var xmlDoc = parser.parseFromString(xmlContent, 'text/xml');

      // Crear un objeto XSLTProcessor
      var xsltProcessor = new XSLTProcessor();

      // Cargar el contenido del XSL
      var xslContent = document.getElementById('xslContent').value;
      var xslDoc = parser.parseFromString(xslContent, 'text/xml');
      xsltProcessor.importStylesheet(xslDoc);

      // Aplicar la transformación XSLT
      var resultDocument = xsltProcessor.transformToDocument(xmlDoc);

      // Obtener el resultado de la transformación como una cadena de texto
      var resultString = new XMLSerializer().serializeToString(resultDocument);

      // Mostrar el resultado en el textarea de salida
      document.getElementById('output').value = resultString;
    }
  </script>
</head>
<body>
  <h1>Conversor XML a XSL</h1>

  <h3>XML de entrada:</h3>
  <textarea id="xmlContent" rows="10" cols="50">
    <!-- Aquí ingresa el contenido XML -->
  </textarea>

  <h3>XSL de salida:</h3>
  <textarea id="xslContent" rows="10" cols="50">
    <!-- Aquí ingresa el contenido XSL -->
  </textarea>

  <br>
  <button onclick="convertirXMLaXSL()">Convertir</button>

  <h3>Resultado:</h3>
  <textarea id="output" rows="10" cols="50" readonly></textarea>
</body>
</html>
