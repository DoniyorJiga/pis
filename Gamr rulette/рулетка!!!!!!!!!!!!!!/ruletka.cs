using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace рулетка______________
{
    class ruletka
    {
		//цвет, значение, четность и диапазон 
		public static string[] Color= { "Черный","Красный"};
        public static int[] Value= { 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36};
        public static string[] Chet = { "Нечетное", "Четное" };
        public string title;
        public int value;
        public string colour;
        public string chet;

        public ruletka(int value)
        {
			this.value = value;
            if (value % 2 == 0)
            {
                this.chet = Chet[1];
                this.colour = Color[0];
                if(value<19)
                title = Color[0] + " " + Chet[1] + " " + "1-18";
                else
                    title = Color[0] + " " + Chet[1] + " " + "19-36";

            }
            else
            {
                this.chet = Chet[0];
                this.colour = Color[1];
                if (value < 19)
                    title =  Color[1] + " " + Chet[0] + " " + "1-18";
                else
                    title =  Color[1] + " " + Chet[0] + " " + "19-36";
            }
		}
        public string acheika2(ruletka c)
        {
            return title;
        }
        public int acheika(ruletka c)
        {
            return c.value;
        }
    }
}
