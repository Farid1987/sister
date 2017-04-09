package com.mscorp.mynotes;

/**
 * Created by MS on 30/03/2017.
 */

public class Contacts {

    private String id, judul, desc;

    public Contacts(String id, String judul, String desc) {
        this.id = id;
        this.judul = judul;
        this.desc = desc;
    }

    public String getId()
    {
        return id;
    }

    public void setId()
    {
        this.id = id;
    }

    public String getJudul()
    {
        return judul;
    }

    public void setJudul()
    {
        this.judul = judul;
    }

    public String getDesc()
    {
        return desc;
    }

    public void setDesc()
    {
        this.desc = desc;
    }
}
