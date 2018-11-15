using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace рулетка______________
{
    class Player
    {
       //класс игрок, храняем счет, если проиграл то минусуется, если выиграл то пюсуется 
        public int schet;
        public Player( int schet)
        {
            
            this.schet = schet;
        }
        public int info()
        {
            return schet;
        }
        public void minus(int a)
        {
            schet -= a;
        }
        public void plus(int a)
        {
            schet += a;
        }
    }
}
