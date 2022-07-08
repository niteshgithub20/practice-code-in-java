import java.util.*;
import java.util.Scanner;
public class Duck
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int n,flag=0;
        n = sc.nextInt();
        while(n>0)
        {
            if(n%10 == 0)
            {
                flag = 1;
                break;
            }
            n = n/10;
            
        }
        System.out.println((flag == 1)?"Yes":"No");

    }
}