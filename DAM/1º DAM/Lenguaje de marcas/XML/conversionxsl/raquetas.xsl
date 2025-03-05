<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match='/'>
        <html>
            <body>
                <h3>COLECCION DE RAQUETAS</h3>
                <table border="1">
                    <tr bgcolor="#CCFFFF">
                        <th style="text-align: left ">MARCA</th>
                        <th style="text-align: left ">MODELO</th>
                        <th style="text-align: left ">AÑO</th>
                        <th style="text-align: left ">PRECIO</th>
                    </tr>
                    <xsl:for-each select="TIENDA/RAQUETA">
                        <tr>
                            <td>
                                <xsl:value-of select="MARCA" />
                            </td>
                            <td>
                                <xsl:value-of select="MODELO" />
                            </td>
                            <td>
                                <xsl:value-of select="ANIO" />
                            </td>
                            <xsl:choose>
                                <xsl:when test="PRECIO>150">
                                    <td bgcolor='#ffff66'>
                                        <xsl:value-of select="PRECIO" />
                                    </td>
                                </xsl:when>
                                <xsl:otherwise>
                                    <td bgcolor='#99899'>
                                        <xsl:value-of select="PRECIO" />
                                    </td>
                                </xsl:otherwise>
                            </xsl:choose>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>