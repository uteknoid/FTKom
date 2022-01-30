<?php

class Data_models extends CI_Model
{
    function data($db)
    {
        return $this->db->get($db);
    }

    function datalimit($table, $limit, $order, $where)
    {
        $this->db->order_by($order, 'DESC');
        $this->db->limit($limit);
        return $this->db->get_where($table, $where);
    }


    function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function beritaterbaru()
    {
        $this->db->order_by('tulisan_tanggal', 'DESC');
        $this->db->limit(5);
        return $this->db->get('berita');
    }

    function beritahome()
    {
        $this->db->order_by('tulisan_tanggal', 'DESC');
        $this->db->limit(10);
        return $this->db->get('berita');
    }

    function beritahari($hari)
    {
        $this->db->like('tulisan_tanggal', $hari);
        return $this->db->get('berita');
    }

    function beritabulan($bulan)
    {
        $this->db->like('tulisan_tanggal', $bulan);
        return $this->db->get('berita');
    }

    function beritatahun($tahun)
    {
        $this->db->like('tulisan_tanggal', $tahun);
        return $this->db->get('berita');
    }

    function cariberita($keyword)
    {
        $this->db->like('berita_nama',$keyword);
        return $this->db->get('berita');
    }
}
