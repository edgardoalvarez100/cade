package com.plussoluciones.cade.dao;

import com.plussoluciones.cade.bean.Categoria;
import com.plussoluciones.cade.conexion.ConexionOracle;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author EAlvarez
 */
public class CategoriaDao extends ConexionOracle{
    Connection conexion;
    
    public List<Categoria> obtenerCategorias() throws SQLException{
       List<Categoria> listaCategoria;
        listaCategoria = new ArrayList<>();

        String sql = "SELECT * from categorias";

        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
              Categoria categoria = new Categoria();
              categoria.setCategoria(rs.getString("categoria"));
              categoria.setIdCategoria(rs.getInt("idcategoria"));
              listaCategoria.add(categoria);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();

        }
        return listaCategoria;
    }
}
