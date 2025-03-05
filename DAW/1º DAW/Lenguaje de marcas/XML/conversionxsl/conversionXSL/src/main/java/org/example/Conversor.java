package org.example;

import org.w3c.dom.Document;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;
import java.io.File;

public class  Conversor {
    static public void convertXMLusingXSL(String inputXML, String inputXSL, String outputXML) throws Exception {
        DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
        DocumentBuilder db = dbf.newDocumentBuilder();
        Document doc = db.parse(inputXML);
        doc.normalize();
        StreamSource xsl = new StreamSource(new File(inputXSL));

        TransformerFactory tf = TransformerFactory.newInstance();
        tf.newTransformer(xsl).transform(new DOMSource(doc),
                new StreamResult(new File(outputXML)));
    }
}
