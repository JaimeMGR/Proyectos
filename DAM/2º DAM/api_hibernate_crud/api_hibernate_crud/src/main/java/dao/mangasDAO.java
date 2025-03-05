package dao;

import entidades.mangas;
import org.hibernate.Session;
import org.hibernate.query.Query;
import util.HibernateUtil;

import javax.persistence.PersistenceException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class mangasDAO implements mangasDAOInterface {
    public List<mangas> devolverTodos() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL
        List<mangas> todos = session.createQuery("from mangas", mangas.class).list();
        session.close();

        return todos;
    }

    @Override
    public List<mangas> devolverTodos(int pagina, int objetos_por_pagina) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL con limits
        Query query = session.createQuery("from mangas", mangas.class);
        query.setMaxResults(objetos_por_pagina);
        query.setFirstResult((pagina - 1) * objetos_por_pagina);
        List<mangas> todos = query.getResultList();

        session.close();

        return todos;
    }

    @Override
    public List<mangas> devolverMasCaros() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL
        List<mangas> caros = session.createQuery("from mangas m where m.precio>500", mangas.class).list();
        session.close();

        return caros;
    }




    @Override
    public List<mangas> buscarEntrePrecios(Double min, Double max) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL

        Query<mangas> query = session.createQuery("from mangas m where m.precio>=:min and m.precio<=:max", mangas.class);
        query.setParameter("min", min);
        query.setParameter("max", max);
        List<mangas> filtro = query.list();
        session.close();

        return filtro;
    }

    @Override
    public List<mangas> buscarEntrePreciosMarca(Double min, Double max, String marca) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL

        Query<mangas> query = session.createQuery("from mangas m where m.precio>=:min and m.precio<=:max and m.marca=:marca", mangas.class);
        query.setParameter("min", min);
        query.setParameter("max", max);
        query.setParameter("marca", marca);
        List<mangas> filtro = query.list();
        session.close();

        return filtro;
    }

    @Override
    public List<mangas> buscarEntrePreciosMarcas(Double min, Double max, List<String> marcas) {

        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL

        Query<mangas> query = session.createQuery("from mangas m where m.precio>=:min and m.precio<=:max and m.marca in (:marcas)", mangas.class);
        query.setParameter("min", min);
        query.setParameter("max", max);
        query.setParameterList("marcas", marcas);
        List<mangas> filtro = query.list();
        session.close();

        return filtro;
    }

    @Override
    public List<String> devolverTodasImages() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL
        Query<String> query = session.createQuery("SELECT m.urlImagen FROM mangas m", String.class);

        List<String> imagenes = query.getResultList();

        session.close();

        return imagenes;
    }

    @Override
    public List<String> devolverimagenytitulo() {
        return null;
    }

    @Override

    public List<Map<String, Object>> devolverNombreImagenes() {
        List<Map<String, Object>> _mangas = new ArrayList<>();

        Session session = HibernateUtil.getSessionFactory().openSession();

        // Consulta HQL
        List<mangas> mangas = session.createQuery("from mangas", mangas.class).list();

        session.close();

        for (mangas entity : mangas) {
            Map<String, Object> _entity = new HashMap<>();

            _entity.put("title", entity.getTitle());
            _entity.put("urlImagen", entity.getUrlImagen());

            _mangas.add(_entity);
        }

        return _mangas;
    }


    @Override
    public Long totalmangas() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        Long contador = (Long) session.createQuery("select count(e) from mangas e").getSingleResult();

        session.close();

        return contador;
    }

    @Override
    public mangas buscarPorAutor(String autor) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        mangas employee = session.find(mangas.class, autor);
        session.close();

        return employee;
    }

    @Override
    public mangas buscarPorGenero(String genero) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        mangas employee = session.find(mangas.class, genero);
        session.close();

        return employee;
    }

    @Override
    public mangas buscarPorEdicion(String edicion) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        mangas employee = session.find(mangas.class, edicion);
        session.close();

        return employee;
    }

    @Override
    public mangas buscarPorId(int id) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        mangas employee = session.find(mangas.class, id);
        session.close();

        return employee;
    }

    @Override
    public Double mediaPrecios() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        Double media = session.createQuery("select avg(e.precio) from mangas e", Double.class).getSingleResult();

        session.close();

        return media;
    }

    @Override
    public Double mediaPreciosMarca(String marca) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        Query<Double> query = session.createQuery("select avg(e.precio) from mangas e where e.marca =:marca", Double.class);
        query.setParameter("marca", marca);
        Double media = (query.getSingleResult());

        session.close();

        return media;
    }

    @Override
    public mangas buscarPorNombre(String title) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        Query<mangas> query = session.createQuery("FROM mangas m WHERE m.title = :title", mangas.class);
        query.setParameter("title", title);

        mangas manga = query.uniqueResult();

        session.close();

        return manga;
    }


    @Override
    public mangas create(mangas mangas) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        try {
            session.beginTransaction();
            session.save(mangas);
            session.getTransaction().commit();
        } catch (PersistenceException e) {
            e.printStackTrace();
            session.getTransaction().rollback();
        }
        session.close();
        return mangas;
    }

    @Override
    public mangas update(mangas mangas) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        try {
            session.beginTransaction();
            session.update(mangas);
            session.getTransaction().commit();
        } catch (PersistenceException e) {
            e.printStackTrace();
            session.getTransaction().rollback();
        }
        session.close();
        return mangas;
    }

    @Override
    public boolean deleteById(int id) {
        Session session = HibernateUtil.getSessionFactory().openSession();

        try {
            session.beginTransaction();

            mangas mangas = this.buscarPorId(id);
            if (mangas != null) {
                session.delete(mangas);
            } else {
                return false;
            }
            session.getTransaction().commit();
        } catch (PersistenceException e) {
            e.printStackTrace();
            session.getTransaction().rollback();
            return false;
        } finally {
            session.close();
        }

        return true;
    }

    @Override
    public boolean deleteAll() {
        Session session = HibernateUtil.getSessionFactory().openSession();

        try {
            session.beginTransaction();

            String deleteQuery = "DELETE FROM mangas";
            Query query = session.createQuery(deleteQuery);
            query.executeUpdate();

            session.getTransaction().commit();
        } catch (PersistenceException e) {
            e.printStackTrace();
            session.getTransaction().rollback();
            return false;
        } finally {
            session.close();
        }

        return true;


    }
}