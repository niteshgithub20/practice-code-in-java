import java.util.*;
import java.util.Scanner;

public class PlayingWithno {
    public static void main(String[] args) {
        Scanner obj=new Scanner(System.in);
        long n=obj.nextLong();
        long qry=obj.nextLong();
        long arr[]=new long[(int) n];
        for (int i = 0; i <n ; i++) {
            arr[i]=obj.nextInt();
        }
            for (int j = 0; j <qry ; j++) {
                long sum=0;
                double ans=0;
                int L=obj.nextInt();
                int R=obj.nextInt();
                sum=(L+R)/2;
                ans=Math.floor(sum);
                System.out.println((int) ans);
            }
    }
}