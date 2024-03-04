import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.net.URL;

import javax.help.HelpBroker;
import javax.help.HelpSet;
import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JTextField;
import javax.swing.WindowConstants;

/**
 * Ejemplo sencillo de uso de JavaHelp. Crea dos ventanas con un menú y les pone
 * la ayuda.
 *
 * @author Chuidiang
 *
 */
public class PruebaJavaHelp {
    /** Ventana secundaria */
    private JDialog secundaria;

    /** Ventana principal */
    private JFrame principal;

    /** Item de menú para la ayuda */
    private JMenuItem itemAyuda;

    /** Boton que despliega la ventana secundaria */
    private JButton botonMuetraSecundaria;


    /**
     * Crea las ventanas, pone la ayuda y visualiza la ventana principal.
     */
    public PruebaJavaHelp() {
        creaVentanaPrincipal();
        creaVentanaSecundaria();

        botonMuetraSecundaria.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                secundaria.setVisible(true);
            }
        });

        ponLaAyuda();
        visualizaVentanaPrincipal();
    }

    /**
     * Con este nombre digo yo que visualizará la ventana principal.
     */
    private void visualizaVentanaPrincipal() {
        principal.pack();
        principal.setVisible(true);
        principal.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
    }

    /**
     * Hace que el item del menu y la pulsacion de F1 visualicen la ayuda.
     */
    private void ponLaAyuda() {
        try {
            // Carga el fichero de ayuda
            File fichero = new File("help/help_set.hs");
            URL hsURL = fichero.toURI().toURL();

            // Crea el HelpSet y el HelpBroker
            HelpSet helpset = new HelpSet(getClass().getClassLoader(), hsURL);
            HelpBroker hb = helpset.createHelpBroker();

            // Pone ayuda a item de menu al pulsarlo y a F1 en ventana
            // principal y secundaria.
            hb.enableHelpOnButton(itemAyuda, "aplicacion", helpset);
            hb.enableHelpKey(principal.getContentPane(), "ventana_principal",
                    helpset);
            hb.enableHelpKey(secundaria.getContentPane(), "ventana_secundaria",
                    helpset);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    /**
     * ¿Quizás crea la ventana principal?
     */
    private void creaVentanaPrincipal() {
        principal = new JFrame("Ventana principal");
        JMenuBar menuBar = new JMenuBar();
        itemAyuda = new JMenuItem("Ayuda");
        menuBar.add(itemAyuda);
        botonMuetraSecundaria = new JButton("Pulsame");
        principal.setJMenuBar(menuBar);
        principal.getContentPane().setLayout(new FlowLayout());
        principal.getContentPane().add(botonMuetraSecundaria);
        principal.getContentPane().add(new JTextField(20));
    }

    /**
     * ¿Tal vez crea la ventana secundaria?
     */
    private void creaVentanaSecundaria() {
        secundaria = new JDialog(principal, "Ventana secundaria");
        secundaria.getContentPane().setLayout(new FlowLayout());
        secundaria.getContentPane().add(new JLabel("Yo no hago nada"));
        secundaria.getContentPane().add(new JTextField(20));
        secundaria.pack();
    }
}