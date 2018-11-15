using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace рулетка______________
{
    class GStavka
    {
        //string [] zvet = { "Крсный","Черный","Нет"};
        //string[] chetnost = { "Четное", "Нечетное", "Нет" };
        //string[] interval = { "1-18", "19-36", "Нет" };
        public int[] a;
        public string zvet;
        public string chetnost;
        public string interval;
        public int e;
        public GStavka(string b, string c,string d)
        {
            if (b != "Нет")
            { this.e = 2; }
            if (c != "Нет")
            { this.e = 2; }
            if (d != "Нет")
            { this.e = 1; }
            this.a = new int[1];
            this.a[0] = 37;
            this.zvet = b;
            this.chetnost = c;
            this.interval = d;
        }
        public GStavka(int ch)
        {
            this.e = 35;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";
            this.a = new int[1];
            this.a[0] = ch;
        }
        public GStavka(int a1, int a2)
        {
            this.e = 17;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";
           
            this.a = new int[2];
            this.a[0] = a1;
            this.a[1] = a2;
        }
        public GStavka(int a1, int a2,int a3)
        {
            this.e = 11;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";

            this.a = new int[3];
            this.a[0] = a1;
            this.a[1] = a2;
            this.a[2] = a3;
            this.a[2] = a3;
           
        }
        public GStavka(int a1, int a2,int a3, int a4)
        {
            this.e = 8;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";

            this.a = new int[4];
            this.a[0] = a1;
            this.a[1] = a2;
            this.a[2] = a3;
            this.a[3] = a4;
          
        }
        public GStavka(int a1, int a2, int a3, int a4,int a5)
        {
            this.e = 6;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";
            this.a = new int[5];
            this.a[0] = a1;
            this.a[1] = a2;
            this.a[2] = a3;
            this.a[3] = a4;
            this.a[4] = a5;
        }
        public GStavka(int a1, int a2, int a3, int a4, int a5,int a6)
        {
            this.e = 5;
            this.zvet = "Нет";
            this.chetnost = "Нет";
            this.interval = "Нет";
            this.a = new int[6];
            this.a[0] = a1;
            this.a[1] = a2;
            this.a[2] = a3;
            this.a[3] = a4;
            this.a[4] = a5;
            this.a[5] = a6;
        }
        //1st12
        public GStavka(string ch)
        {
            this.e = 2;
                this.zvet = "Нет";
                this.chetnost = "Нет";
                this.interval = "Нет";
            if (ch == "1st12")
            {
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                    this.a[i] = i + 1;
            }
            if(ch == "2st12")
            {
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                    this.a[i] = i + 13;
            }
            if (ch == "3st12")
            {
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                    this.a[i] = i + 25;
            }
            if (ch == "2to11")
            {
                int h = 1;
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                {
                    this.a[i] = h;
                    h += 3;
                }
            }
            if (ch == "2to12")
            {
                int h = 2;
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                {
                    this.a[i] = h;
                    h += 3;
                }
            }
            if (ch == "2to11")
            {
                int h = 3;
                this.a = new int[12];
                for (int i = 0; i < 12; i++)
                {
                    this.a[i] = h;
                    h += 3;
                }
            }
            
        }
        public int[] stavka(GStavka c)
            {
                return c.a;
            }
        public string stavka2(GStavka c)
        {
            return c.zvet+" "+c.chetnost+" "+c.interval;
        }
    }

}
