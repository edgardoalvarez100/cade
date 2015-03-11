/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.plussoluciones.cade.servicio;

import com.plussoluciones.cade.bean.Categoria;
import com.plussoluciones.cade.bean.Usuario;
import com.plussoluciones.cade.dao.UsuarioDao;
import java.sql.SQLException;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;

/**
 *
 * @author EAlvarez
 */
@WebService(serviceName = "usuario")
public class UsuarioService {

    private UsuarioDao usuarioDao;

    public UsuarioService() {
        usuarioDao = new UsuarioDao();
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "loguear")
    public Usuario loguear(@WebParam(name = "correo") String correo, @WebParam(name = "password") String password) {
        try {
            return usuarioDao.loguear(correo, password);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "registrar")
    public String registrar(@WebParam(name = "usuario") Usuario usuario) {
        try {
            return usuarioDao.registrar(usuario);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "obtenerUsuarios")
    public List<Usuario> obtenerUsuarios() {
        try {
            return usuarioDao.obtenerUsuarios();
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "actualizarConPassword")
    public String actualizarConPassword(@WebParam(name = "usuario") Usuario usuario) {
        try {
            return usuarioDao.actualizarConPassword(usuario);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "actualizarSinPassword")
    public String actualizarSinPassword(@WebParam(name = "usuario") Usuario usuario) {
        try {
            return usuarioDao.actualizarSinPassword(usuario);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "buscarUsuarioLike")
    public List<Usuario> buscarUsuarioLike(@WebParam(name = "cedula") String texto) {
        try {
            return usuarioDao.buscarUsuarioLike(texto);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "buscarUsuarioEmpleadoLike")
    public List<Usuario> buscarUsuarioLikeEmpleado(@WebParam(name = "cedula") String texto) {
        try {
            return usuarioDao.buscarUsuarioEmpleadoLike(texto);
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);

        }
        return null;
    }

    @WebMethod(operationName = "eliminar")
    public String eliminar(@WebParam(name = "cedula") String cedula) {
        try {
            return usuarioDao.eliminar(cedula);
        } catch (SQLException ex) {

            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }

    @WebMethod(operationName = "agregarCategoriaEmpleado")
    public String agregarCategoriaEmpleado(@WebParam(name = "idCategoria") int idCategoria, @WebParam(name = "cedula") String cedula) {
        try {
            return usuarioDao.agregarCategoriaEmpleado(idCategoria, cedula);
        } catch (SQLException ex) {

            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
    
    @WebMethod(operationName = "obtenerCategoriasEmpleado")
     public List<Categoria> obtenerCategoriasEmpleado(@WebParam(name = "cedula") String cedula){
          try {
            return usuarioDao.obtenerCategoriasEmpleado(cedula);
        } catch (SQLException ex) {

            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
     }
      
     public String validarUsuarioEmpleado(String cedula) {
          try {
            return usuarioDao.validarUsuarioEmpleado(cedula);
        } catch (SQLException ex) {

            Logger.getLogger(UsuarioService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
     }
}
