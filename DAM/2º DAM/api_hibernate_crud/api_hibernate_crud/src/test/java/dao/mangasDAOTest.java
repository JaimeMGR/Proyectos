package dao;

import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;

public class mangasDAOTest {

    static mangasDAOInterface dao;

    @BeforeAll
    static void setUp(){
        dao=new mangasDAO();
    }

    @AfterAll
    static void setDown(){
        //     dao.deleteAll();
    }

    @Test
    void devolverTodos() {
        System.out.println(dao.devolverTodos());


    }
}
