import java.util.*;
import java.util.Scanner;
public class SumOdd
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num,digit,sum;
        num = sc.nextInt();
        sum = 0;
        for(int i = 1;i <= num; i++)
        {
            
            if((i%2!=0) || (i%2==0))
            {
                continue;
            }else{
                sum = sum+i;
            }
            
        }
        System.out.println(sum);
    }
}