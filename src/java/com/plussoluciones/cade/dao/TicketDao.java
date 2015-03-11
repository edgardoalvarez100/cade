package com.plussoluciones.cade.dao;

import com.plussoluciones.cade.conexion.ConexionOracle;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

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
            if (cst!= null) {
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
            if (cst!= null) {
                cst.close();
            }
            conexion.close();
        }
        return "FALSE";
    }

    public String cerrarTicket() {
        return null;

    }
}
