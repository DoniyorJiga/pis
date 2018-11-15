using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace рулетка______________
{
    class Gamee
    {
        public GStavka s;
        public ruletka k;
        public int srav()
        {
          
            for(int i=0; i<s.stavka(s).Length; i++)
            if(k.acheika(k)== s.stavka(s)[i])
                {
                    return s.e;
                }
            string[] a = s.stavka2(s).Split(' ');
            string[] b = k.acheika2(k).Split(' ');
            if (a[0] == b[0] || a[1] == b[1] || a[2] == b[2]) return s.e;
                return 0;
        }
		///form stav igr
        public Gamee(string b, string c, string d)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(b, c, d);
            k = new ruletka(u);
        }
        public Gamee(int a)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a);
            k = new ruletka(u);
        }
        public Gamee(string b)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(b);
            k = new ruletka(u);
        }
        public Gamee(int a1,int a2,int a3, int a4, int a5,int a6)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a1,a2,a3,a4,a5,a6);
            k = new ruletka(u);
        }
        public Gamee(int a1, int a2, int a3, int a4, int a5)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a1, a2, a3, a4, a5);
            k = new ruletka(u);
        }
        public Gamee(int a1, int a2, int a3, int a4)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a1, a2, a3, a4);
            k = new ruletka(u);
        }
        public Gamee(int a1, int a2, int a3)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a1, a2, a3);
            k = new ruletka(u);
        }
        public Gamee(int a1, int a2)
        {
            Random r = new Random();
            int u = r.Next(1, 36);
            s = new GStavka(a1, a2);
            k = new ruletka(u);
        }
    }
}
