package com.plussoluciones.cade.servicio;

import com.plussoluciones.cade.bean.Categoria;
import com.plussoluciones.cade.dao.CategoriaDao;
import java.sql.SQLException;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.jws.WebMethod;
import javax.jws.WebService;

/**
 *
 * @author EAlvarez
 */
@WebService(serviceName = "categoria")
public class CategoriaService {

    private CategoriaDao categoriaDao;

    public CategoriaService() {
        categoriaDao = new CategoriaDao();
    }

    @WebMethod(operationName = "obtenerCategorias")
    public List<Categoria> obtenerCategorias() {
        try {
            return categoriaDao.obtenerCategorias();
        } catch (SQLException ex) {
            Logger.getLogger(CategoriaService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
}
