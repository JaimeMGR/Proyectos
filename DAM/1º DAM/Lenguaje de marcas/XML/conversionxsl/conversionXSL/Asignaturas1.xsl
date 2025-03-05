<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match='/'>

    </xsl:template>
    <!--<!DOCTYPE html>-->
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tu Página Web</title>
            <style>

            </style>
        </head>
        <body>
            <xsl:for-each select="catalog/foo:cd">
            </xsl:for-each>
        </body>
    </html>

</xsl:stylesheet>