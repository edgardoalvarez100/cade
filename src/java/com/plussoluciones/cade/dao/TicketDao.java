package com.plussoluciones.cade.dao;

import com.plussoluciones.cade.bean.Respuesta;
import com.plussoluciones.cade.bean.Ticket;
import com.plussoluciones.cade.bean.Usuario;
import com.plussoluciones.cade.conexion.ConexionOracle;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import oracle.jdbc.OracleCallableStatement;
import oracle.jdbc.OracleTypes;

/**
 *
 * @author EAlvarez
 */
public class TicketDao extends ConexionOracle {

    Connection conexion;

    public String crearTicket(int idUsuario, int idCategoria, String asunto, String mensaje) throws SQLException {

        String sql = "{call CREARTICKET(?,?,?,?,?)}";
        CallableStatement cst = null;
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(5, java.sql.Types.INTEGER);
            cst.setInt(1, idUsuario);
            cst.setInt(2, idCategoria);
            cst.setString(3, asunto);
            cst.setString(4, mensaje);
            cst.executeUpdate();
            int res = cst.getInt(5);
            if (res == 0) {
                return "FALSE";
            } else {
                return "TRUE";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }
            conexion.close();
        }
        return "FALSE";
    }

    public String responderTicket(String mensaje, int idUsuario, int idTicket) throws SQLException {
        String sql = "{call RESPONDERTICKET(?,?,?,?)}";
        CallableStatement cst = null;
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(4, java.sql.Types.INTEGER);
            cst.setInt(2, idUsuario);
            cst.setInt(3, idTicket);
            cst.setString(1, mensaje);
            cst.executeUpdate();
            int res = cst.getInt(4);
            if (res == 0) {
                return "FALSE";
            } else {
                return "TRUE";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }
            conexion.close();
        }
        return "FALSE";
    }

    public String cerrarTicket(int idTicket) throws SQLException {
        String sql = "{call CERRARTICKET(?,?)}";
        CallableStatement cst = null;
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(2, java.sql.Types.INTEGER);
            cst.setInt(1, idTicket);
            cst.executeUpdate();
            int res = cst.getInt(2);
            if (res == 0) {
                return "FALSE";
            } else {
                return "TRUE";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }
            conexion.close();
        }
        return "FALSE";
    }

    public Ticket obtenerTicketPorId(int idTicket) throws SQLException {
        String sql = "{call ObtenerTicketPorId(?,?)}";
        CallableStatement cst = null;
        ResultSet rs = null;
        Ticket respuesta = new Ticket();
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(2, OracleTypes.CURSOR);
            cst.setInt(1, idTicket);
            cst.executeUpdate();
            rs = ((OracleCallableStatement) cst).getCursor(2);
            while (rs.next()) {
                Usuario usuario = new Usuario();
                respuesta.setIdTicket(rs.getInt("idticket"));
                respuesta.setIdCategoria(rs.getInt("idcategoria"));
                usuario.setId(rs.getInt("idusuario"));
                respuesta.setUsuario(usuario);
                respuesta.setFecha(rs.getString("fecha"));
                respuesta.setAsunto(rs.getString("asunto"));
                respuesta.setIdEstado(rs.getInt("idestado"));
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }
            conexion.close();
        }
        return respuesta;
    }
    
      public List<Respuesta> obtenerRespuestasPorIdTicket(int idTicket) throws SQLException {
        String sql = "{call ObtenerRespuestasPorIdTicket(?,?)}";
        CallableStatement cst = null;
        ResultSet rs = null;
        List<Respuesta> lista = new ArrayList();
        
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(2, OracleTypes.CURSOR);
            cst.setInt(1, idTicket);
            cst.executeUpdate();
            rs = ((OracleCallableStatement) cst).getCursor(2);
            while (rs.next()) {
                Usuario usuario = new Usuario();
                Respuesta respuesta = new Respuesta();
                usuario.setTipo(rs.getString("tipousuario"));
                usuario.setNombre(rs.getString("nombre"));
                usuario.setApellidos(rs.getString("apellidos"));
                respuesta.setUsuario(usuario);
                respuesta.setFecha(rs.getString("fecha"));
                respuesta.setRespuesta(rs.getString("respuesta"));
                lista.add(respuesta);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }
            conexion.close();
        }
        return lista;
    }
}
