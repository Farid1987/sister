package com.mscorp.mynotes;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by MS on 30/03/2017.
 */

public class Adapter extends ArrayAdapter {
    List list = new ArrayList();
    public Adapter(Context context, int resource) {
        super(context, resource);
    }

    public void add(Contacts object) {
        super.add(object);
        list.add(object);
    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Nullable
    @Override
    public Object getItem(int position) {
        return list.get(position);
    }

    @NonNull
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        View row;
        row = convertView;
        ContactHolder contactHolder;
        if(row == null)
        {
            LayoutInflater layoutInflater = (LayoutInflater) this.getContext().getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            row = layoutInflater.inflate(R.layout.row_layout,parent,false);
            contactHolder = new ContactHolder();
            contactHolder.id = (TextView) row.findViewById(R.id.id);
            contactHolder.judul = (TextView) row.findViewById(R.id.judul);
            contactHolder.desc = (TextView) row.findViewById(R.id.desc);
            row.setTag(contactHolder);
        }
        else
        {
            contactHolder = (ContactHolder) row.getTag();
        }

        Contacts contacts = (Contacts) this.getItem(position);
        contactHolder.id.setText(contacts.getId());
        contactHolder.judul.setText(contacts.getJudul());
        contactHolder.desc.setText(contacts.getDesc());
        return row;
    }

    static class ContactHolder
    {
        TextView id, judul, desc;
    }
}
