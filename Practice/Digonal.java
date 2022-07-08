import java.util.*;
import java.io.*;
class Digonal{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int row = sc.nextInt();
        int col = sc.nextInt();
        int[][] arr = new int[row][col];
        int sum;
        for(int i=0;i<row;i++){
            for(int j=0;j<col;j++){
                arr[i][j] = sc.nextInt();
            }
        }
        sum=0;
        for(int i=0;i<row;i++){
            for(int j=0;j<col;j++){
                if(i == j){
                    sum = sum+arr[i][j];
                }
            }
        }
        System.out.println(sum);
    }
}