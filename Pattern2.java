import java.util.*;
import java.util.Scanner;
public class Pattern2
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int n,col,row;
        n =sc.nextInt();
        for(row = 1;row<=n;row++)
        {
            for(col=1;col<=n+1-row;col++)
            {
                System.out.print("*");
            }
            System.out.println();
        }
    }
}
/*     
**********
*********
********
*******
******
*****
****
***
**
*
*/