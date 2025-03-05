package org.example;

public class Main {
    public static void main(String[] args) {
        String inputXML = "raquetas.xml";
        String inputXSL = "raquetas.xsl";
        String outputXML = "resultado.html";
        try {
            Conversor.convertXMLusingXSL(inputXML, inputXSL, outputXML);
        }
        catch (Exception e)
        {
            System.out.println(e.getMessage());
        }
    }
}