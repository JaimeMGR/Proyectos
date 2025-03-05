import dao.mangasDAO;
import servicios.mangasAPIREST;

public class Servidor {

    public static void main(String[] args) {

        mangasAPIREST api=new mangasAPIREST(new mangasDAO());
    }
}
